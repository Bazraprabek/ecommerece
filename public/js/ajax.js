// // Sort Ajax

// let sort = document.getElementById('sort');
// sort.addEventListener('change',function(){

//     const row = document.getElementById('row');

//     const xhr = new XMLHttpRequest();
//     xhr.open('POST','http://127.0.0.1:8000/api/sort',true);
//     xhr.onprogress = function(){
//         console.log('on Progress');
//     }
//     xhr.onload = function(){
//         str = "";
//         const obj = JSON.parse(this.responseText);
//         console.log(obj);
//         // obj.forEach(item => {
//         //     str += `
//         //     <a href="{{url('products/')."/".${item.product_id}}}" class="card">
//         //     <img src="{{${item.image}}}" alt="{{${item.title}}}">
//         //     <div class="info">
//         //         <h4>{{${item.title}}</h4>
//         //         <p class="sec">{{${item.genre}}}</p>
//         //         <p>Rs {{${item.price}}}</p>
//         //     </div>
//         //     </a>
//         //     `;
//         // });
//         // row.innerHTML = str;
//     }
//     xhr.send();
// })