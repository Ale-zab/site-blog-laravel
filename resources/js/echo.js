Echo
    .private('admin.article')
    .listen('.article.update', (e) => {
    alert(
        'Cтатья, коорая была изменена: ' + e.name +
        '\nПоля, коорые были изменены: ' + e.inputs +
        '\nCсылка: ' + e.url
    );

    console.log(e);
});
