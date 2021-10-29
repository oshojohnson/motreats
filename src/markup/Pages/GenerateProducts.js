constructor(props) {
  super(props);

  this.state = {
    selectedTable: '',
    selectedColumns: [],
    tables: [],
    columns: [],
    tableData: [],
    auth: 'Basic ' + btoa(props.user + ':' + props.pass),
  };
  
  this.onTableChange = this.onTableChange.bind(this);
  this.onColumnChange = this.onColumnChange.bind(this);
  this.renderTableHeaders = this.renderTableHeaders.bind(this);
  this.renderTableBody = this.renderTableBody.bind(this);
  this.getColumnList = this.getColumnList.bind(this);
  this.getData = this.getData.bind(this);    
  
}