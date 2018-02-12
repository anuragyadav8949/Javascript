#Enter Values in Specific Table cells Based on some Condition.

var ac_table = document.getElementById("account_table")//Table
													
	for(i=1;i<ac_table.rows.length-2;i++)
	{
		var objCells = ac_table.rows[i].cells[0].innerHTML; //Getting value from one cell
		var isDebitCredit = ac_table.rows[i].cells[5].innerHTML; //fetting value from cell
		 	if(isDebitCredit=='Bill')
			{
				ac_table.rows[i].cells[6].innerText = objCells;//INserting values in a cell
			}
			else
			{
				ac_table.rows[i].cells[7].innerText = objCells; //Inserting value in a cell
			}
	}
