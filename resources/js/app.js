const { default: Echo } = require('laravel-echo');

require('./bootstrap');


let echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
});

echo.channel('favourite-color')
    .listen('UserFavouriteColorUpdated', (e) => {
        console.log(e);
        document.getElementById("favColor").innerHTML = e.user.favourite_color['color']
    });