import XLSX from 'xlsx';
import 'tableexport';

export default {
  methods: {
    exportToExcel() {
      const table = this.$refs.myTable;
      const wb = XLSX.utils.table_to_book(table);
      XLSX.writeFile(wb, 'table_data.xlsx');
    }
  }
};