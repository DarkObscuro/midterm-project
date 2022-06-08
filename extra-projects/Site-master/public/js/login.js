document.querySelectorAll(".input_container input").forEach(coco => 
{
    coco.onfocus = function() 
    {
      coco.classList.add("focus");
      coco.style.borderColor="rgb(250, 200, 106)";
    }

    coco.onblur = function() 
    {
      if (coco.value === "")
      {
        coco.classList.remove("focus");
        coco.style.borderColor="#837a7a";
      }
    }
});