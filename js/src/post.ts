import axios from "axios";
import {PostResponseModel} from "./models/postResponse.model";
import {httpPolling} from "./utils/polling";
import {contentForPost} from "./template/templates";

const pollTime:number=2000;
const postContainer : HTMLElement = document.querySelector(".post-container") as HTMLElement;

const fetchData=():void=>{
    const urlParams : URLSearchParams = new URLSearchParams(window.location.search);
    const id : string = urlParams.get('id') as string;
    axios.get(`http://localhost/blog/api/posts/?id=${id}`)
        .then((res:{data:PostResponseModel}):void=>{
            const {data} = res;
            postContainer.innerHTML=contentForPost(data.img, data.title, data.description, data.author, data.content, data.date);
        }).catch(err=>postContainer.innerHTML="Something Don't Work We Cannot Download the Sources")
}

fetchData()
httpPolling(fetchData,pollTime)
