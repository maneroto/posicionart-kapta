window.onload = function()
{
	setupInputs();
	let inputs = document.querySelectorAll("input[type='text'], input[type='email'], input[type='url']");
	for(let i = 0; i < inputs.length; i++)
	{
		inputs[i].value = "";
	}
}

function setupInputs()
{
	let inputs = document.querySelectorAll("input");
	for (let i = 0; i < inputs.length; i ++)
	{
		inputs[i].addEventListener(
			"focus", function(){
				this.parentElement.classList.add("focused");
			}
			);

		inputs[i].addEventListener(
			"blur", function()
			{
				if (this.value == "") this.parentElement.classList.remove("focused");
			}
			);
	}
}