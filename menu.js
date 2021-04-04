var blnOk=true;

function Chargement() {

  if(document.body.style.backgroundColor!="") { blnOk=false; }
  if(document.body.style.color!="") { blnOk=false; }
  if(document.body.style.marginTop!="") { blnOk=false; }
  if(document.getElementById) {
    with(document.getElementById("texte").style) {
      if(position!="") { blnOk=false; }
      if(top!="") { blnOk=false; }
      if(left!="") { blnOk=false; }
      if(width!="") { blnOk=false; }
      if(height!="") { blnOk=false; }
      if(zIndex!="") { blnOk=false; }
      if(margin!="") { blnOk=false; }
      if(padding!="") { blnOk=false; }
      if(visibility!="") { blnOk=false; }
    }
  }
  else{
  blnOk=false;
  }

  if(blnOk) {
    with(document.body.style) {
      backgroundColor="#333";
      color="#FFF";
      marginTop="5.2em";
    }
      
    with(document.getElementById("access").style) {
      position="absolute";
      top="1em";
      left="1em";
      margin="0";
    }
      
    with(document.getElementById("texte").style) {
      margin="0";
      padding="1em";
      backgroundColor="#FFF";
      color="#333";
    }
    
    for(i=1;i<=3;i++) {
      with(document.getElementById("menu"+i).style) {
        position="absolute";
        top="3em";
        left=(((i-1)*11)+1)+"em";
        width="10em";
        height="1.2em";
        textAlign="center";
        margin="0";
        padding="0";
        zIndex="2";
      }
    }
    
    for(i=1;i<=3;i++) {
      with(document.getElementById("ssmenu"+i).style) {
        position="absolute";
        top="4.4em";
        left=(((i-1)*11)+1)+"em";
        width="12em";
        margin="0";
        padding="0";
        zIndex="3";
      }
    }
    
    with(document.getElementById("copy").style) {
      backgroundColor="#333";
      color="#FFF";
    }
    
    CacherMenus();
  }
}

function MontrerMenu(strMenu) {
  if(blnOk) {
    CacherMenus();  
    document.getElementById(strMenu).style.visibility="visible";
  }
}

function CacherMenus() {
  if(blnOk) {
    for(i=1;i<=3;i++) {
      with(document.getElementById("ssmenu"+i).style) {
        visibility="hidden";
      }
    }
  }
}