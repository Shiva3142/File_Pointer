function updateFileLable(event) {
    let fileLable=document.getElementById('fileLable');
    let file=document.getElementById('file');
    let list_of_file = file.files;
    console.log(list_of_file.length);
    if (list_of_file.length>0) {
        console.log(list_of_file);
        let string=``
        let counter=0;
        for (let index = 0; index < list_of_file.length; index++) {
            console.log(list_of_file[index].name);
            string=string+`
            <div>
                ${++counter}] ${list_of_file[index].name}
            </div>
            <br/>
            `;
        }
        fileLable.innerHTML=string;
    } else {
        fileLable.innerHTML="Upload File Here";
    }
}