import { rec, att } from "obj_not.js";

const jToD = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];

async function recQuery() {
  let out = await rec("rec_queries.php");
  console.log(out);
  return JSON.parse(out);
}
const rq = recQuery()
console.log(rq)
async function recQueryByDate(startDate, endDate) {
  let out = await att
  (
    "rec_queries_by_date.php",
    JSON.stringify({ start_date: startDate, end_date: endDate })
  );
  console.log(out);
  return JSON.parse(out);
}

function Date(date) {
  let isDay = date.split("-");
  let year = isDay[0].substr(2);
  let month = jToD[parseInt(isDay[1]) - 1];
  let day = parseInt(isDay[2]);

  return `${day}-${month}-${year}`;
}

async function popTable(e) {
  let form = document.querySelector("form");
  let isValid = form.checkValidity();

  if (!isValid) {
    form.reportValidity();
  } else {
    e.preventDefault();
    let startDate = $("#begin-date").val();
    let endDate = $("#end-date").val();

    startDate = Date(startDate);
    endDate = Date(endDate);

    let props = await recQueryByDate(startDate, endDate);
    let table = $("#arch-form-table");

    table.html("");

    table.append(`
    <th>Submission Date</th>
    <th>fullName</th>
    <th>email</th>
    <th>mobileNumber</th>
    <th>officeNumber</th>
    <th>homeAddress</th>
    <th>officeAddress</th>
    <th>building</th>
    <th>buildingHeight</th>
    <th>buildingRooms</th>
    
  `);

    for (let prop of props) {
      let row = $("<tr></tr>");

      for (let col in prop) {
        let c = `<td>${prop[col]}</td>`;
        row.append(c);
      }

      table.append(row);
    }
  }
}

$("#submit-btn").click(popTable);