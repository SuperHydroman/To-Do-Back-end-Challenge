// var test2 = [];
// test2[0] = document.getElementById("inputState");
// console.log(test2[0].children[0].selected);

var input = document.getElementById("inputState");
var currentInputs = 0;
var labelCounter = 1;

input.onchange = setTaskAmount;

function setTaskAmount() {
    let optionText = this.children[this.options.selectedIndex].innerHTML;

    if (optionText > currentInputs) {

        let remainingInputs = optionText - currentInputs;
        currentInputs = optionText;

        for (let i = 1; i <= remainingInputs; i++) {
            let createGroupDiv = document.createElement("DIV");
            let createLabel = document.createElement("LABEL");
            let createInput = document.createElement("INPUT");

            let createTimeGroupDiv = document.createElement("DIV");
            let createTimeLabel = document.createElement("LABEL");
            let createTimeInput = document.createElement("INPUT");

            createGroupDiv.classList.add("form-group", "col-md-7");

            createInput.id = "task-"+i;
            createInput.classList.add("form-control");
            createInput.placeholder = "Wat is de taak?";
            createInput.type = "text";

            createLabel.innerHTML = "Taak " + labelCounter;
            createLabel.setAttribute("for", "task-"+i);

            createTimeGroupDiv.classList.add("form-group", "col-md-4");

            createTimeInput.type = "time";
            createTimeInput.id = "time-task-" + labelCounter;
            createTimeInput.classList.add("form-control");
            createTimeInput.setAttribute("step", 1);

            createTimeLabel.innerHTML = "Hoelang doet u over de taak? <i id='timeTooltip' class=\"far fa-question-circle\" data-placement=\"right\" data-toggle=\"tooltip\" data-html=\"true\" title=\"<b>The format is: hours/minutes/seconds</b>\"></i>";

            document.getElementById("task-container").appendChild(createGroupDiv);
            createGroupDiv.appendChild(createLabel);
            createGroupDiv.appendChild(createInput);

            document.getElementById("task-container").appendChild(createTimeGroupDiv);
            createTimeGroupDiv.appendChild(createTimeLabel);
            createTimeGroupDiv.appendChild(createTimeInput);

            <!-- Tooltips made by Bootstrap v4.0-->
            $('#timeTooltip').ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
            labelCounter++;
        }
    }
}

// Now remove unecessary inputs. Or make them invisible. So for example when user changes from 5 to 2 inputs. Then 3 inputs will be removed.