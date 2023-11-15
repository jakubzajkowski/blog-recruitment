import axios from "axios";
import {PostModel} from "./models/post.model";
import {httpPolling} from "./utils/polling";

const pollTime:number=2000;
const cardsContainer : HTMLElement = document.querySelector(".cards-container") as HTMLElement;

const card = (imgUrl: string, title: string, author: string, id: number):string=> {
    return `<div class="col-md-4">
                        <div class="card d-flex flex-column my-2">
                            <div class="card-body">
                                <a class="card-link" href="/blog/post?id=${id}">
                                    <img class="card-img" loading="lazy" src="${imgUrl}" alt="Img">
                                    <h5 class="card-title">${title}</h5>
                                    <p class="card-text">${author}</p>
                                </a>
                            </div>
                        </div>
                    </div>`
}
const fetchData=():void=>{
    axios.get("http://localhost/blog/api/posts/")
        .then((res:{data:PostModel[]}):void=>{
            let content :string= '';
            res.data.forEach((post:PostModel)=>content+=card(post.img,post.title,post.author,post.id))
            cardsContainer.innerHTML=content;
        }).catch(err=>cardsContainer.innerHTML="Something Don't Work We Cannot Download the Sources")
}
fetchData()
httpPolling(fetchData,pollTime)

