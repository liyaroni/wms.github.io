/***Function to populate query combo when category selected***/

function populateCmbQuery(queryArr){
	document.frmAgentEntry.cmbQuery.length=0;
	document.frmAgentEntry.cmbQuery.add(new Option("",-1));
	for(i=0;i<queryArr.length;i++){
		selectedCategory=document.frmAgentEntry.cmbCategory.options[document.frmAgentEntry.cmbCategory.selectedIndex].text;
		if(selectedCategory==queryArr[i][QRY_ARR_CATEGORY])
			//document.frmAgentEntry.cmbQuery.add(new Option(queryArr[i][2],queryArr[i][0]));
			document.frmAgentEntry.cmbQuery.add(new Option(queryArr[i][QRY_ARR_SUBCATEGORY],i));
		}
	
}

/***Funciton to populate workcode when subcategory selected***/

function populateTxtWorkCode(queryArr){
	
	document.frmAgentEntry.txtWorkCode.value="";
	if(document.frmAgentEntry.cmbQuery.options[document.frmAgentEntry.cmbQuery.selectedIndex].value!=-1){
		document.frmAgentEntry.txtWorkCode.value=queryArr[document.frmAgentEntry.cmbQuery.options[document.frmAgentEntry.cmbQuery.selectedIndex].value][QRY_ARR_WORKCODE]; //queryArr[i][workCode]
	}
	
}


/**Function for verifiy valid workcode given and choose exact category and subcategory for that**/

function verifyCategoryNQuery(queryArr){
	if(document.frmAgentEntry.txtWorkCode.value.length==4){
		var workCode=document.frmAgentEntry.txtWorkCode.value;
		for(var i=0;i<queryArr.length;i++){
			if(queryArr[i][QRY_ARR_WORKCODE]==workCode){
				len=document.frmAgentEntry.cmbCategory.length;
				for(var j=1;j<len;j++){
					if(queryArr[i][QRY_ARR_CATEGORY]==document.frmAgentEntry.cmbCategory.options[j].text){
						document.frmAgentEntry.cmbCategory.selectedIndex=j;
						break;
					}
				}
				populateCmbQuery(queryArr);
				len=document.frmAgentEntry.cmbQuery.length;
				for(j=1;j<len;j++){
					if(queryArr[i][QRY_ARR_SUBCATEGORY]==document.frmAgentEntry.cmbQuery.options[j].text){
						document.frmAgentEntry.cmbQuery.selectedIndex=j;
						break;
					}
				}
				

				
				break;
			}
		}
		if(i==queryArr.length){
			window.alert("Invalid work code");
			document.frmAgentEntry.txtWorkCode.value="";
			document.frmAgentEntry.txtWorkCode.focus();
			return;
		}
	}
	
}

/**populate work code from the selection of the tree**/

function populateWorkCodeFromTree(codeString){
	var workCode=codeString.split(' : ');
	document.frmAgentEntry.txtWorkCode.value=workCode[1];	
	document.frmAgentEntry.txtWorkCode.focus();
	document.frmAgentEntry.txtcardnum.focus();
	
}






