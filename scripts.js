aside = document.getElementsByTagName('aside')[0];
inject = '';
orderJSON = '';
fetch('data2.json')
	.then(response=>response.json())
	.then(data=>{
        orderJSON = sortOrders(data);
        displayOrders(orderJSON)
        
    })

function sortapproval(data){
    j=0;
    for (let i = 0; i < data.length; i++) {
        if(data[i]['approval']==''){
            let t = data[j];
            data[j] = data[i];
            data[i] = t;
            j++;
        }
    }
    return data;
}
function sortOrders(data){
    data.sort((a,b)=>((a['dop'].toLowerCase()>b['dop'].toLowerCase())?1:(b['dop'].toLowerCase()>a['dop'].toLowerCase())?-1:(a['pname'].toLowerCase()>b['pname'].toLowerCase())?1:(b['pname'].toLowerCase()>a['pname'].toLowerCase())?-1:0));
    return sortapproval(data);
}
function displayOrders(data){
    for (let i = 0; i < data.length; i++) {
        let isapproval = data[i].approval == ''
        inject += '<div class="order-card';
        if(isapproval)
            inject += ' pending-approval">';
        else
            inject += '">';
        inject += '<img src="' + data[i].orderon + '.svg">';
        inject += '<h2>' + data[i].pname + '</h2>'
        if(!isapproval) inject += '<span title="Schedule Pickup">S.P</span><br>';
        else inject+='<br>';
        inject += '<p class="order-id">'+ data[i].pid + '</p>';
        inject += '<p class="delivery">Delivery:&nbsp;<span>' + data[i].dop + '</span></p>';
        if(isapproval)
            inject += '<span class="approve"><i class="fa fa-check"></i>Approve</span><span class="reject"><i class="fa fa-times"></i>Reject</span>'
        inject += '</div>';
    }
    aside.innerHTML = inject;

}