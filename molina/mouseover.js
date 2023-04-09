

<!--
if (document.images) {


homeon = new Image(72, 27);
homeon.src = "picts/homeON.gif"

homeoff = new Image(72, 27);
homeoff.src = "picts/homeOFF.gif"


}

function img_act(imgName) {
if (document.images) {
imgOn = eval(imgName + "on.src");
document [imgName].src = imgOn;
}
}

function img_inact(imgName) {
if (document.images) {
imgOff = eval(imgName + "off.src");
document [imgName].src = imgOff;
}
}