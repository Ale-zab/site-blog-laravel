<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\User;
use App\Notifications\NewArticle;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendMailNewArticleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:send
        {date_start? : Required: This is the start date (Example: 21.01.2022) }
        {date_end? : This is the end date (Example: 25.02.2022)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to user about new article';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = [
            'dateStart' => $this->argument('date_start') ?? null,
            'dateEnd'   => $this->argument('date_end') ?? null
        ];

        $dateFilter = collect($date)->filter(function($value) {
            return \DateTime::createFromFormat('d.m.Y', $value);
        });

        if ($dateFilter->isEmpty()) {
            $dateFilter->put('dateStart', Carbon::now()->startOfWeek()->subDays(7));
            $dateFilter->put('dateEnd', Carbon::now()->endOfWeek()->subDays(7));
        }

        if (!$dateFilter->get('dateEnd')) {
            $dateFilter['dateEnd'] = Carbon::now();
        }

        $dateFromat = $dateFilter->map(function($value) {
            return Carbon::parse($value, 'Europe/Moscow');
        });

        if ($dateFromat['dateEnd']->lte($dateFromat['dateStart'])) {
            return $this->error("Error! Your dateStart > dateEnd");
        }

        $articles = Article::where('status', 1)
            ->whereBetween('created_at', [$dateFromat['dateStart'], $dateFromat['dateEnd']])
            ->get();

        if ($articles->isEmpty()) {
            return $this->line("Articles not found");
        }

        $users = User::all();

        $users->map->notify(new NewArticle($articles));
    }
}
