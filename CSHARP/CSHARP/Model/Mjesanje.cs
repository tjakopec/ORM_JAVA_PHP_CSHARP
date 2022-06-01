using System;
using System.ComponentModel.DataAnnotations.Schema;

namespace CSHARP.Model
{
    [Table("mjesanje")]
    public abstract class Mjesanje: Entitet
    {
        
        public abstract Rezultat getRezultat();
        public string vrsta { get; set; }
        public bool stiglja { get; set; }
        public bool belot { get; set; }
    }
}
