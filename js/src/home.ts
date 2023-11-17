import axios from "axios";
import {PostResponseModel} from "./models/postResponse.model";
import {httpPolling} from "./utils/polling";
import {cardContentForHome} from "./template/templates";

const pollTime:number=2000;
const cardsContainer : HTMLElement = document.querySelector(".cards-container") as HTMLElement;

const fetchData=():void=>{
    axios.get("http://localhost/blog/api/posts/")
        .then((res:{data:PostResponseModel[]}):void=>{
            const {data} = res;
            let content :string= '';
            data.forEach((post:PostResponseModel)=>content+=cardContentForHome(post.img,post.title,post.author,post.id))
            cardsContainer.innerHTML=content;
        }).catch(err=>cardsContainer.innerHTML="Something Don't Work We Cannot Download the Sources")
}
fetchData()
httpPolling(fetchData,pollTime)

