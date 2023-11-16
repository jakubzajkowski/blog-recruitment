import axios from "axios";
import {PostResponseModel} from "./models/postResponse.model";
import {httpPolling} from "./utils/polling";
import Swal, {SweetAlertResult} from 'sweetalert2'
import {DeleteRequestModel} from "./models/deleteRequest.model";

const pollTime:number=2000;
const listContainer : HTMLElement = document.querySelector(".list-group") as HTMLElement;

const card = (title: string, description: string,id: number): string => {
    return `
        <li class="list-group-item my-3 post">
            <div>
                <h5>${title}</h5>
                <p>${description}</p>
                <button class="btn btn-danger btn-sm float-right btn--delete mx-1 " data-id="${id}">Delete</button>
                <button class="btn btn-primary btn-sm float-right btn--update mx-1">Update</button>
            </div>
        </li>`;
};
const addDeleteButtonListener = ():void => {
    const deleteButtons:NodeListOf<HTMLButtonElement> = document.querySelectorAll('.btn--delete');
    deleteButtons.forEach((button:Element) => {
        const postId : string = button.getAttribute('data-id') as string;
        button.addEventListener('click', ()=>showDeleteConfirmation(postId));
    });
};
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
            res.data.forEach((post:PostResponseModel)=>content+=card(post.title,post.description,post.id))
            listContainer.innerHTML=content;
            addDeleteButtonListener();
        }).catch(err=>listContainer.innerHTML="Something Don't Work We Cannot Download the Sources")
}
fetchData()
httpPolling(fetchData,pollTime)