
//GETTING DOM ELEMENTS
const addBtn = document.querySelector("#addpost form button");
const maneChildren = document.querySelectorAll(".child");
const postDiv = document.querySelectorAll(".post");

//DISPLAY CONTENT BASED ON SECTIONS
const changeCont = id => maneChildren.forEach(child => child.id == id ? child.classList.add("force-show") : child.classList.remove("force-show"));

//ADDING HOVER ANIMATIONS
postDiv.forEach(post =>{
    post.addEventListener("mouseover", hoverOn);
    post.addEventListener("mouseout", hoverOff);
});

function hoverOn(){
    this.classList.add("smoothshow");
    postDiv.forEach(item =>{
       if(item != this){
        item.style.opacity = "0.2";
       }
    });
}

function hoverOff(){
    this.classList.remove("smoothshow");
    postDiv.forEach(item =>{
        if(item != this){
         item.style.opacity = "1";
        }
     });
}



//MANGANNG POSTS,ADDIND DELETE BUTTON
function deleteItem(elem){
    let currentElem = elem.parentElement.parentElement;
    currentElem.classList.add("hideout")
    setTimeout(()=> currentElem.classList.add("force-hide"),2500)
}


//ADDING ANOTHER ARTICLE TO PAGE
addBtn.addEventListener("click", function(e){
    e.preventDefault();
    let success = false;
    const textinput =document.querySelector("#textinput").value;
    const body =  document.querySelector("#body").value;

    const sliceText = (text) => {
      
        if(text.length < 138){
            success = true;

            return `<p>${text}</p>`
        }else if(text.length > 138 && text.length < 249){
            let text1 = text.slice(0, 138);
            let text2 = text.slice(0,text.length);

            success = true;
            return `<p>${text1}</p><p>${text2}</p>`
        }else {
            success ==
            alert("Your article can't exceed more than 250 characters");
        }
    }

    let template = `
        <aside class="post">
            <div class="header"><span onclick="deleteItem(this)">Delete</span></div>
            <h4>${textinput}</h4>
            <div class="content">
                ${sliceText(body)}
            </div>
        </aside>
    `;
    
    if(success === true){
        document.querySelector("#posts").innerHTML += template;
        setTimeout(()=>changeCont('posts'), 1500);
    }
    
})


window.addEventListener("DOMContentLoaded", ()=>changeCont('posts') );