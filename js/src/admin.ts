import axios from "axios";
import {PostModel} from "./models/post.model";
import {httpPolling} from "./utils/polling";
import Swal, {SweetAlertResult} from 'sweetalert2'

const pollTime:number=2000;
const listContainer : HTMLElement = document.querySelector(".list-group") as HTMLElement;

const card = (title: string, description: string): string => {
    return `
        <li class="list-group-item my-3">
            <div>
                <h5>${title}</h5>
                <p>${description}</p>
                <button class="btn btn-danger btn-sm float-right btn--delete mx-1">Delete</button>
                <button class="btn btn-primary btn-sm float-right btn--update mx-1">Update</button>
            </div>
        </li>`;
};
const addDeleteButtonListener = ():void => {
    const deleteButtons:NodeListOf<HTMLButtonElement> = document.querySelectorAll('.btn--delete');
    deleteButtons.forEach((button:Element) => {
        button.addEventListener('click', showDeleteConfirmation);
    });
};
const showDeleteConfirmation = () => {
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
            Swal.fire('Deleted!', 'Your post has been deleted.', 'success');
        }
    });
};
const fetchData=():void=>{
    axios.get("http://localhost/blog/api/posts")
        .then((res:{data:PostModel[]}):void=>{
            let content :string= '';
            res.data.forEach((post:PostModel)=>content+=card(post.title,post.description))
            listContainer.innerHTML=content;
            addDeleteButtonListener();
        }).catch(err=>listContainer.innerHTML="Something Don't Work We Cannot Download the Sources")
}
fetchData()
httpPolling(fetchData,pollTime)
