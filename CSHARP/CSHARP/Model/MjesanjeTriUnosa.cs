using System;
using System.ComponentModel.DataAnnotations.Schema;

namespace CSHARP.Model
{
    [Table(name: "mjesanje")]
    public class MjesanjeTriUnosa:MjesanjeDvaUnosa
    {

        public int bodovaTreciUnos { get; set; }
        public int zvanjeTreciUnos { get; set; }


        public override Rezultat getRezultat()
        {
            var r = base.getRezultat();
            r.treci = bodovaTreciUnos + zvanjeTreciUnos;
            return r;
        }
    }
}
