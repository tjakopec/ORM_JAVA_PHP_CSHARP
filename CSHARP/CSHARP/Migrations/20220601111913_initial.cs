using Microsoft.EntityFrameworkCore.Metadata;
using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace CSHARP.Migrations
{
    public partial class initial : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AlterDatabase()
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateTable(
                name: "Igraci",
                columns: table => new
                {
                    id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySql:ValueGenerationStrategy", MySqlValueGenerationStrategy.IdentityColumn),
                    ime = table.Column<string>(type: "longtext", nullable: true)
                        .Annotation("MySql:CharSet", "utf8mb4"),
                    prezime = table.Column<string>(type: "longtext", nullable: true)
                        .Annotation("MySql:CharSet", "utf8mb4"),
                    urlSlika = table.Column<string>(type: "longtext", nullable: true)
                        .Annotation("MySql:CharSet", "utf8mb4"),
                    spol = table.Column<int>(type: "int", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Igraci", x => x.id);
                })
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateTable(
                name: "Lokacije",
                columns: table => new
                {
                    id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySql:ValueGenerationStrategy", MySqlValueGenerationStrategy.IdentityColumn),
                    longitude = table.Column<double>(type: "double", nullable: false),
                    latitude = table.Column<double>(type: "double", nullable: false),
                    naziv = table.Column<string>(type: "longtext", nullable: true)
                        .Annotation("MySql:CharSet", "utf8mb4")
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Lokacije", x => x.id);
                })
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateTable(
                name: "Partije",
                columns: table => new
                {
                    id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySql:ValueGenerationStrategy", MySqlValueGenerationStrategy.IdentityColumn),
                    doKolikoSeIgra = table.Column<int>(type: "int", nullable: false),
                    lokacijaid = table.Column<int>(type: "int", nullable: false),
                    unosiid = table.Column<int>(type: "int", nullable: false),
                    vrsta = table.Column<string>(type: "longtext", nullable: false)
                        .Annotation("MySql:CharSet", "utf8mb4")
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Partije", x => x.id);
                    table.ForeignKey(
                        name: "FK_Partije_Igraci_unosiid",
                        column: x => x.unosiid,
                        principalTable: "Igraci",
                        principalColumn: "id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_Partije_Lokacije_lokacijaid",
                        column: x => x.lokacijaid,
                        principalTable: "Lokacije",
                        principalColumn: "id",
                        onDelete: ReferentialAction.Cascade);
                })
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateTable(
                name: "Mjesanja",
                columns: table => new
                {
                    id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySql:ValueGenerationStrategy", MySqlValueGenerationStrategy.IdentityColumn),
                    vrsta = table.Column<string>(type: "longtext", nullable: false)
                        .Annotation("MySql:CharSet", "utf8mb4"),
                    stiglja = table.Column<bool>(type: "tinyint(1)", nullable: false),
                    belot = table.Column<bool>(type: "tinyint(1)", nullable: false),
                    bodovaPrviUnos = table.Column<int>(type: "int", nullable: true),
                    bodovaDrugiUnos = table.Column<int>(type: "int", nullable: true),
                    zvanjePrviUnos = table.Column<int>(type: "int", nullable: true),
                    zvanjeDrugiUnos = table.Column<int>(type: "int", nullable: true),
                    bodovaTreciUnos = table.Column<int>(type: "int", nullable: true),
                    zvanjeTreciUnos = table.Column<int>(type: "int", nullable: true),
                    Partijaid = table.Column<int>(type: "int", nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Mjesanja", x => x.id);
                    table.ForeignKey(
                        name: "FK_Mjesanja_Partije_Partijaid",
                        column: x => x.Partijaid,
                        principalTable: "Partije",
                        principalColumn: "id");
                })
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateTable(
                name: "partija_igrac",
                columns: table => new
                {
                    igraciid = table.Column<int>(type: "int", nullable: false),
                    partijeid = table.Column<int>(type: "int", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_partija_igrac", x => new { x.igraciid, x.partijeid });
                    table.ForeignKey(
                        name: "FK_partija_igrac_Igraci_igraciid",
                        column: x => x.igraciid,
                        principalTable: "Igraci",
                        principalColumn: "id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_partija_igrac_Partije_partijeid",
                        column: x => x.partijeid,
                        principalTable: "Partije",
                        principalColumn: "id",
                        onDelete: ReferentialAction.Cascade);
                })
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateIndex(
                name: "IX_Mjesanja_Partijaid",
                table: "Mjesanja",
                column: "Partijaid");

            migrationBuilder.CreateIndex(
                name: "IX_partija_igrac_partijeid",
                table: "partija_igrac",
                column: "partijeid");

            migrationBuilder.CreateIndex(
                name: "IX_Partije_lokacijaid",
                table: "Partije",
                column: "lokacijaid");

            migrationBuilder.CreateIndex(
                name: "IX_Partije_unosiid",
                table: "Partije",
                column: "unosiid");
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "Mjesanja");

            migrationBuilder.DropTable(
                name: "partija_igrac");

            migrationBuilder.DropTable(
                name: "Partije");

            migrationBuilder.DropTable(
                name: "Igraci");

            migrationBuilder.DropTable(
                name: "Lokacije");
        }
    }
}
