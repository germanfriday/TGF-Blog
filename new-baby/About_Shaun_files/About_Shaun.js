// Created by iWeb 2.0.4 local-build-20090804

setTransparentGifURL('Media/transparent.gif');function applyEffects()
{var registry=IWCreateEffectRegistry();registry.registerEffects({stroke_0:new IWStrokeParts([{rect:new IWRect(-1,1,2,231),url:'About_Shaun_files/stroke.png'},{rect:new IWRect(-1,-1,2,2),url:'About_Shaun_files/stroke_1.png'},{rect:new IWRect(1,-1,173,2),url:'About_Shaun_files/stroke_2.png'},{rect:new IWRect(174,-1,2,2),url:'About_Shaun_files/stroke_3.png'},{rect:new IWRect(174,1,2,231),url:'About_Shaun_files/stroke_4.png'},{rect:new IWRect(174,232,2,1),url:'About_Shaun_files/stroke_5.png'},{rect:new IWRect(1,232,173,1),url:'About_Shaun_files/stroke_6.png'},{rect:new IWRect(-1,232,2,1),url:'About_Shaun_files/stroke_7.png'}],new IWSize(175,233))});registry.applyEffects();}
function hostedOnDM()
{return false;}
function onPageLoad()
{loadMozillaCSS('About_Shaun_files/About_ShaunMoz.css')
adjustLineHeightIfTooBig('id1');adjustFontSizeIfTooBig('id1');adjustLineHeightIfTooBig('id2');adjustFontSizeIfTooBig('id2');adjustLineHeightIfTooBig('id3');adjustFontSizeIfTooBig('id3');adjustLineHeightIfTooBig('id4');adjustFontSizeIfTooBig('id4');fixAllIEPNGs('Media/transparent.gif');Widget.onload();fixupAllIEPNGBGs();fixupIECSS3Opacity('id5');applyEffects()}
function onPageUnload()
{Widget.onunload();}
