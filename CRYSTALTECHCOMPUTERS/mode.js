const toggle =document.getElementById('toggledark');
const body =document.querySelector('body');

toggle.addEventListener('click',function(){
this.classList.toggle('fa-adjust');
if(this.classList.toggle('fa-adjust')){
    body.style.background ='white';
    body.style.color="text-dark";
    body.style.transition='1s';
}

})