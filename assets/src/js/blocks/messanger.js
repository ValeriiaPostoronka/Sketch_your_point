let submitCommentButton = document.querySelector("a[href='#send-comment']");

if (submitCommentButton !== null) {
    submitCommentButton.addEventListener('click', () => {
        let commentForm = document.forms["submit-form"];
        let textarea = commentForm.getElementsByTagName('textarea');

        if (textarea[0].value.length != 0) {
            commentForm.submit();
        }
        else {
            alert("Не можливо відправити пустий коментар");
        }
    });
}