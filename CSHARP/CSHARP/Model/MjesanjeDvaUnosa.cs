using System;
using System.ComponentModel.DataAnnotations.Schema;

namespace CSHARP.Model
{
    public class MjesanjeDvaUnosa:Mjesanje
    {
        [Column("bodovaprviunos")]
        public int bodovaPrviUnos { get; set; }
        [Column("bodovadrugiunos")]
        public int bodovaDrugiUnos { get; set; }

        [Column("zvanjeprviunos")]
        public int zvanjePrviUnos { get; set; }
        [Column("zvanjedrugiunos")]
        public int zvanjeDrugiUnos { get; set; }

        public override Rezultat getRezultat()
        {
            return new Rezultat
            {
                prvi = bodovaPrviUnos + zvanjePrviUnos,
                drugi = bodovaDrugiUnos + zvanjeDrugiUnos
            };
        }
    }
}
