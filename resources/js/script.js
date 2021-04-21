var input = document.getElementById("taskAmount");
var currentInputs = 0;
var labelCounter = 1;
input.onchange = setTaskAmount;

function setTaskAmount() {

    let optionText = this.children[this.options.selectedIndex].value;

    if (optionText > currentInputs) {

        let remainingInputs = optionText - currentInputs;
        currentInputs = optionText;

        for (let i = 1; i <= remainingInputs; i++) {
            let createRowGroup = document.createElement("DIV");

            let createGroupDiv = document.createElement("DIV");
            let createLabel = document.createElement("LABEL");
            let createInput = document.createElement("INPUT");

            let createTimeGroupDiv = document.createElement("DIV");
            let createTimeLabel = document.createElement("LABEL");
            let createTimeInput = document.createElement("INPUT");

            createRowGroup.id = "task-"+labelCounter+"-group";
            createRowGroup.classList.add("form-row", "text-white", "justify-content-center");

            createGroupDiv.classList.add("form-group", "col-md-7");

            createInput.id = "task-"+labelCounter;
            createInput.name = "tasks["+labelCounter+"]";
            createInput.classList.add("form-control");
            createInput.placeholder = "What is the task?";
            createInput.type = "text";

            createLabel.innerHTML = "Task " + labelCounter;
            createLabel.setAttribute("for", "task-"+labelCounter);

            createTimeGroupDiv.classList.add("form-group", "col-md-4");

            createTimeInput.type = "time";
            createTimeInput.name = "taskTimes["+labelCounter+"]";
            createTimeInput.id = "time-task-" + labelCounter;
            createTimeInput.classList.add("form-control");
            createTimeInput.setAttribute("step", 1);

            createTimeLabel.innerHTML = "How much time do you need? <i id='timeTooltip' class=\"far fa-question-circle\" data-placement=\"right\" data-toggle=\"tooltip\" data-html=\"true\" title=\"<b>The format is: hours/minutes/seconds</b>\"></i>";

            document.getElementById("task-container").append(createRowGroup);

            createRowGroup.appendChild(createGroupDiv);
            createGroupDiv.appendChild(createLabel);
            createGroupDiv.appendChild(createInput);

            createRowGroup.appendChild(createTimeGroupDiv);
            createTimeGroupDiv.appendChild(createTimeLabel);
            createTimeGroupDiv.appendChild(createTimeInput);

            <!-- Tooltips made by Bootstrap v4.0-->
            $('#timeTooltip').ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
            labelCounter++;
        }
    }
    else if (optionText < currentInputs) {
        let removeInputs = currentInputs - optionText;
        currentInputs = optionText;

        for (let i = 0; i < removeInputs; i++) {
            let parent = document.getElementById("task-container");
            parent.removeChild(parent.lastChild);
            labelCounter--;
        }
    }
}