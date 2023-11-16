export const addDeleteButtonListener = (showDeleteConfirmation:(id:string)=>void):void => {
    const deleteButtons:NodeListOf<HTMLButtonElement> = document.querySelectorAll('.btn--delete');
    deleteButtons.forEach((button:Element) => {
        const postId : string = button.getAttribute('data-id') as string;
        button.addEventListener('click', ()=>showDeleteConfirmation(postId));
    });
};
export const addUpdateButtonListener = (showUpdateModal:(id : string)=>void):void => {
    const updateButtons:NodeListOf<HTMLButtonElement> = document.querySelectorAll('.btn--update');
    updateButtons.forEach((button:Element) => {
        const postId : string = button.getAttribute('data-id') as string;
        button.addEventListener('click', ()=>showUpdateModal(postId));
    });
};