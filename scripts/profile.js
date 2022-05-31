function toggleprofile() {
    let profiledetails=document.getElementById('profiledetails');
    let passwordManagement=document.getElementById('passwordManagement');
    if (profiledetails.style.display=='none') {
        passwordManagement.style.display='none';
        profiledetails.style.display='block'
    } else {
        passwordManagement.style.display='flex';
        profiledetails.style.display='none'
        
    }
}

function copyTOClipBoard(event) {
    let stringvalue=document.getElementById('password').innerText;
    console.log(stringvalue);
    navigator.clipboard.writeText(stringvalue);
    document.getElementById('message').innerText='Copied to Clipboard'
    document.getElementById('message').style.border=' 1px solid aqua'
    document.getElementById('message').style.padding='5px 20px'
}


async function updatePassword(event) {
    try {
        let response=await fetch('updatepassword.php');
        console.log(response);
        window.location.reload();
    } catch (error) {
        console.log(error);
    }
}