var navitem=document.querySelectorAll('header .nav-bar .nav-list .nav-item')

console.log(navitem);

const blend=()=>{
 var blend=document.querySelector('header .back_blend');   
//  console.log(blend);
 blend.style.display="block";

}
const blend_off=()=>{
    var blend=document.querySelector('header .back_blend');   
    // console.log(blend);
    blend.style.display="none";
}

navitem[1].addEventListener('mouseover',blend)
navitem[1].addEventListener('mouseout',blend_off)
navitem[5].addEventListener('mouseover',blend)
navitem[5].addEventListener('mouseout',blend_off)