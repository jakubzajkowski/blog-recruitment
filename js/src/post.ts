import axios from "axios";
import {PostModel} from "./models/post.model";
import {httpPolling} from "./utils/polling";

const pollTime:number=2000;
const postContainer : HTMLElement = document.querySelector(".post-container") as HTMLElement;

const post = (img: string, title: string, description:string, author: string, content: string, date: string):string=> {
    return `<h1>${title}</h1>
            <h5 class="my-3">${description}</h5>
            <img class="w-50" src="${img}" alt="car" loading="lazy">
            <p class="my-3">${content}</p>
            <p class="my-3">${author}</p>
            <p class="my-3">Date: ${date}</p>
    `
}
const fetchData=():void=>{
    const urlParams : URLSearchParams = new URLSearchParams(window.location.search);
    const id : string = urlParams.get('id') as string;
    axios.get(`http://localhost/blog/api/posts/?id=${id}`)
        .then((res:{data:PostModel}):void=>{
            const {data} = res;
            postContainer.innerHTML=post(data.img, data.title, data.description, data.author, data.content, data.date);
        }).catch(err=>postContainer.innerHTML="Something Don't Work We Cannot Download the Sources")
}

fetchData()
httpPolling(fetchData,pollTime)
