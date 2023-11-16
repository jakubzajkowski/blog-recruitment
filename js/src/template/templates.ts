export const postContentForAdmin = (title: string, description: string,id: number): string => {
    return `
        <li class="list-group-item my-3 post">
            <div>
                <h5>${title}</h5>
                <p>${description}</p>
                <button class="btn btn-danger btn-sm float-right btn--delete mx-1 " data-id="${id}">Delete</button>
                <button class="btn btn-primary btn-sm float-right btn--update mx-1" data-id="${id}">Update</button>
            </div>
        </li>`;
};

export const updateAlertContent=(id:string):string => {
    return `<form id="postForm" action="../api/update-post/index.php" method="POST" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="postTitle">Title:</label>
                    <input type="text" class="form-control" id="postTitle" name="title" required>
                </div>
                <div class="form-group">
                    <label for="postDescription">Description:</label>
                    <textarea class="form-control" id="postDescription" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="postContent">Content:</label>
                    <textarea class="form-control" id="postContent" name="content" rows="6" required></textarea>
                </div>
                <div class="form-group">
                    <label for="postAuthor">Author:</label>
                    <input type="text" class="form-control" id="postAuthor" name="author" required>
                </div>
                <div class="form-group">
                    <label for="postImage">Upload Image:</label>
                    <input type="file" class="form-control-file" id="postImage" name="img" accept="image/*" required>
                </div>
                <input value="${id}" style="display: none" name="id">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        `
}