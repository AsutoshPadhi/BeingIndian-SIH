$(document).ready(function()
{
	alert("asd");
	$("#formAddIssue").validate(
	{
		rules:
		{
			issueTitle: 
			{
				required: true,
				minlength: 4
			}
		},
		messages:
		{
			issueTitle: 
			{
				required: "Please enter the issue",
				minlength: "Title must consist of at least 4 characters"
			}
		},
		submitHandler: function(form)
		{
			form.submit();
			alert("You Logged In!");
		}
	});
});
