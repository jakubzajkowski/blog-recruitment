import axios from "axios";
import {PostResponseModel} from "./models/postResponse.model";
import {httpPolling} from "./utils/polling";
import Swal, {SweetAlertResult} from 'sweetalert2'
import {DeleteRequestModel} from "./models/deleteRequest.model";
import {postContentForAdmin,updateAlertContent} from "./template/templates";
import {addUpdateButtonListener,addDeleteButtonListener} from "./listeners/listeners";

const pollTime:number=2000;
const listContainer : HTMLElement = document.querySelector(".list-group") as HTMLElement;

const showDeleteConfirmation = (postId: string) => {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result:SweetAlertResult):void => {
        if (result.isConfirmed) {
            handelDelete(postId)
            Swal.fire('Deleted!', 'Your post has been deleted.', 'success');
        }
    });
};
const handelDelete=(id:string):void=>{
    const data : DeleteRequestModel= {id:id}
    axios.post("http://localhost/blog/api/delete-post/index.php",data,{ headers: { 'Content-Type': 'application/json' } })
        .then(({data}):void=>console.log(data)).catch((err)=>console.log(err))
}
const fetchData=():void=>{
    axios.get("http://localhost/blog/api/posts")
        .then((res:{data:PostResponseModel[]}):void=>{
            let content :string= '';
            res.data.forEach((post:PostResponseModel)=>content+=postContentForAdmin(post.title,post.description,post.id))
            if (res.data.length==0){
                listContainer.innerHTML=`<h4 class="my-3">You have No Posts!!!</h4>`;
            }else {
                listContainer.innerHTML=content;
            }
            addDeleteButtonListener(showDeleteConfirmation);
            addUpdateButtonListener(showUpdateModal)
        }).catch(err=>listContainer.innerHTML="Something Don't Work We Cannot Download the Sources")
}
fetchData()
httpPolling(fetchData,pollTime)

const showUpdateModal = (postId: string) => {
    Swal.fire({
        title: 'Update This Post',
        html: updateAlertContent(postId),
        icon: 'info',
        confirmButtonText:'Close'
    })
}