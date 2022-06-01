using System;
using System.ComponentModel.DataAnnotations.Schema;

namespace CSHARP.Model
{
    [Table("lokacija")]
    public class Lokacija:Entitet
    {
        public double longitude { get; set; }
        public double latitude { get; set; }
        public string? naziv { get; set; }

    }
}
