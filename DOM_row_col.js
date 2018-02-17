if(action_value ==0)
			{
				var category_table = document.getElementById("categoryTable");
				//alert(category_table.rows.length);
				for( var i=1;i<category_table.rows.length;i++)
				{
					var objCells = category_table.rows[i].cells;
					console.log(objCells.length);
					for(var j=0;j<category_table.rows[i].cells.length-1;j++)
					{
						console.log(category_table.rows[i].cells[j].disabled=true);
					}
				}
