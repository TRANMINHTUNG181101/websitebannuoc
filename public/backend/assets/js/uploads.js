function  UpImg() {
    if (document.getElementById("img-category")){
    document.getElementById("img-category").style.display = "none";
}
    var fileSL = document.getElementById('img').files;
    if (fileSL.length > 0) {
        var imgUp = fileSL[0];
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoaderEvent) {
            var srcI = fileLoaderEvent.target.result;
            var newImg = document.createElement('img');
            newImg.src = srcI;
            
            document.getElementById('displayIMG').innerHTML =  newImg.outerHTML;
        }
        fileReader.readAsDataURL(imgUp);   
    }

}
$(document).ready(function() {
    let todayDate = new Date().toISOString().slice(0, 10);
    $('input[name=hansd]').attr({
      "min": todayDate
    });
  });
  $('.gianhap1').simpleMoneyFormat();
