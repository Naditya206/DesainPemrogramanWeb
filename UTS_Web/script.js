$(document).ready(function () {
    $('.fade-in').each(function (index) {
        $(this).delay(300 * index).queue(function (next) {
            $(this).addClass('visible');
            next();
        });
    });

    $('.catalog-item').hover(
        function () {
            $(this).stop().animate({ opacity: 0.8 }, 300);
        },
        function () {
            $(this).stop().animate({ opacity: 1 }, 300);
        }
    );
});

$(document).ready(function () {
function updateTime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    var currentTime = hours + ':' + minutes + ':' + seconds;
    $('#current-time').text("Jam Sekarang: " + currentTime);
}

setInterval(updateTime, 1000);

updateTime();
});