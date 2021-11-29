document.getElementById("newOpen").addEventListener("click", () => {
    let openQuestion = document.createElement("input");
    openQuestion.type = "text";
    document.getElementById("formulaire").appendChild(openQuestion);
});

document.getElementById("newMulti").addEventListener("click", () => {
    for (let index = 0; index <= 4; index++) {
        let multiQuestion = document.createElement("input");
        multiQuestion.type = "text";
        document.getElementById("formulaire").appendChild(multiQuestion);       
    }
});