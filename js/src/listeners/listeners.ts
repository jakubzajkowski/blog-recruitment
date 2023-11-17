export const addListener = (showUpdateModal:(id : string)=>void,selector: string):void => {
    const Buttons:NodeListOf<HTMLButtonElement> = document.querySelectorAll(selector);
    Buttons.forEach((button:Element) => {
        const postId : string = button.getAttribute('data-id') as string;
        button.addEventListener('click', ()=>showUpdateModal(postId));
    });
};