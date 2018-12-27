$(document).ready(function() {
  if ($('.examenInterfaz').length) {
    console.log("ya estoy listo");
    var minutesLabel = document.getElementById("ExamTimerMinutos");
    var secondsLabel = document.getElementById("ExamTimerSegundos");
    var totalSeconds = 0;

    setInterval(setTime, 1000);

    function setTime() {
      ++totalSeconds;
      secondsLabel.innerHTML = pad(totalSeconds % 60);
      minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
    }

    function pad(val) {
      var valString = val + "";
      if (valString.length < 2) {
        return "0" + valString;
      } else {
        return valString;
      }
    }
    $('.respuestasText').each(function () {
      // console.log($('#'+this.id).contents('p').length);
      var cantidadRes=$('#'+this.id).contents('p').length;
      var margen = 95/parseInt(cantidadRes);
      // console.log(margen);
      $('#'+this.id).find('p').css('width',margen+'%');
    });
  }

});
