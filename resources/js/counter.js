
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

console.log("WHY?");
console.log(document.children.length);
console.log(document.children[0].textContent);
document.getElementById("plus").addEventListener("click", function(){
    document.getElementById("plus").textContent = "bye";
    console.log("SUMO");
    var num = Integer.parseInt(document.getElementById("amount").textContent) + 1;
    document.getElementById("amount").textContent = num;
});
// document.getElementById("minus").addEventListener("click", plusOrMinus("minus"));

// function plusOrMinus(theId){
//     console.log("ME LLAMAN");
//     var num = document.getElementById("amount");
//     if (theId == "plus")
//     {
//         console.log("MASMAS");
//         num++;
//     }
//     else if(num => 0)
//     {
//         console.log("MenoS");
//         num--;
//     }
// }