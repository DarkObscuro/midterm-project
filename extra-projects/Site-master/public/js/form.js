document.querySelectorAll(".groupe_medecin input").forEach(coco => 
{
    coco.onfocus = function() 
    {
      coco.classList.add("focus");
      coco.style.borderColor="orange";
    }

    coco.onblur = function() 
    {
      if (coco.value === "") 
      {
        coco.classList.remove("focus");
        coco.style.borderColor="white";
      } 
      else if (saisieValide()==false) 
      {
        coco.style.borderColor="red";
      }
    }
});

toto = document.querySelector(".groupe_medecin select"); 
toto.onfocus = function() 
{
  toto.classList.add("focus");
  toto.style.borderColor="orange";
}

toto.onblur = function() 
{
  if (toto.value === "") 
  {
    toto.classList.remove("focus");
    toto.style.borderColor="white";
  }
}

function saisieValide()
{
  let regex;
  switch (this.name) 
  {
    case ("codeP"):
      regex = /[0-9]{5}/i;
      if(!regex.test(this.value))
      {
        return false;
      } else {
        return true;
      }

    default:
      return true;
  }
}