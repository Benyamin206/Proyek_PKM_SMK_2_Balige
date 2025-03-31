package routes

import (
	"API/controllers"
	"github.com/gin-gonic/gin"
)

func SetupRouter() *gin.Engine {
	r := gin.Default()

	r.GET("/bisnis", controllers.GetBisnis)
	r.GET("/bisnis/:id", controllers.GetBisnisByID)
	r.POST("/bisnis", controllers.CreateBisnis)
	r.PUT("/bisnis/:id", controllers.UpdateBisnis)
	r.DELETE("/bisnis/:id", controllers.DeleteBisnis)

	r.GET("/gurus", controllers.GetGurus)
	r.GET("/gurus/:id", controllers.GetGuru)
	r.POST("/gurus", controllers.CreateGuru)
	r.PUT("/gurus/:id", controllers.UpdateGuru)
	r.DELETE("/gurus/:id", controllers.DeleteGuru)
	r.POST("/import-gurus", controllers.ImportGurus)

	r.GET("/courses", controllers.GetCourses)
	r.GET("/courses/:id", controllers.GetCourse)
	r.POST("/courses", controllers.CreateCourse)
	r.PUT("/courses/:id", controllers.UpdateCourse)
	r.DELETE("/courses/:id", controllers.DeleteCourse)

	r.GET("/jawaban-siswa-latihan-soals", controllers.GetJawabanSiswaLatihanSoals)
	r.GET("/jawaban-siswa-latihan-soals/:id", controllers.GetJawabanSiswaLatihanSoal)
	r.POST("/jawaban-siswa-latihan-soals", controllers.CreateJawabanSiswaLatihanSoal)
	r.PUT("/jawaban-siswa-latihan-soals/:id", controllers.UpdateJawabanSiswaLatihanSoal)
	r.DELETE("/jawaban-siswa-latihan-soals/:id", controllers.DeleteJawabanSiswaLatihanSoal)

	r.GET("/jawaban-siswa-quizzes", controllers.GetJawabanSiswaQuizzes)
	r.GET("/jawaban-siswa-quizzes/:id", controllers.GetJawabanSiswaQuiz)
	r.POST("/jawaban-siswa-quizzes", controllers.CreateJawabanSiswaQuiz)
	r.PUT("/jawaban-siswa-quizzes/:id", controllers.UpdateJawabanSiswaQuiz)
	r.DELETE("/jawaban-siswa-quizzes/:id", controllers.DeleteJawabanSiswaQuiz)

	r.GET("/jawaban-siswa-ujians", controllers.GetJawabanSiswaUjians)
	r.GET("/jawaban-siswa-ujians/:id", controllers.GetJawabanSiswaUjian)
	r.POST("/jawaban-siswa-ujians", controllers.CreateJawabanSiswaUjian)
	r.PUT("/jawaban-siswa-ujians/:id", controllers.UpdateJawabanSiswaUjian)
	r.DELETE("/jawaban-siswa-ujians/:id", controllers.DeleteJawabanSiswaUjian)

	r.GET("/kelas", controllers.GetKelas)
	r.GET("/kelas/:id", controllers.GetKelasByID)
	r.POST("/kelas", controllers.CreateKelas)
	r.PUT("/kelas/:id", controllers.UpdateKelas)
	r.DELETE("/kelas/:id", controllers.DeleteKelas)

	r.GET("/kurikulum", controllers.GetKurikulum)
	r.GET("/kurikulum/:id", controllers.GetKurikulumByID)
	r.POST("/kurikulum", controllers.CreateKurikulum)
	r.PUT("/kurikulum/:id", controllers.UpdateKurikulum)
	r.DELETE("/kurikulum/:id", controllers.DeleteKurikulum)

	r.GET("/latihan-soals", controllers.GetLatihanSoals)
	r.GET("/latihan-soals/:id", controllers.GetLatihanSoal)
	r.POST("/latihan-soals", controllers.CreateLatihanSoal)
	r.PUT("/latihan-soals/:id", controllers.UpdateLatihanSoal)
	r.DELETE("/latihan-soals/:id", controllers.DeleteLatihanSoal)

	r.GET("/latihan-soal-soals", controllers.GetLatihanSoalSoals)
	r.GET("/latihan-soal-soals/:id", controllers.GetLatihanSoalSoal)
	r.POST("/latihan-soal-soals", controllers.CreateLatihanSoalSoal)
	r.PUT("/latihan-soal-soals/:id", controllers.UpdateLatihanSoalSoal)
	r.DELETE("/latihan-soal-soals/:id", controllers.DeleteLatihanSoalSoal)

	r.GET("/mata-pelajaran", controllers.GetMataPelajaran)
	r.GET("/mata-pelajaran/:id", controllers.GetMataPelajaranByID)
	r.POST("/mata-pelajaran", controllers.CreateMataPelajaran)
	r.PUT("/mata-pelajaran/:id", controllers.UpdateMataPelajaran)
	r.DELETE("/mata-pelajaran/:id", controllers.DeleteMataPelajaran)

	r.GET("/quizzes", controllers.GetQuizzes)
	r.GET("/quizzes/:id", controllers.GetQuiz)
	r.POST("/quizzes", controllers.CreateQuiz)
	r.PUT("/quizzes/:id", controllers.UpdateQuiz)
	r.DELETE("/quizzes/:id", controllers.DeleteQuiz)

	r.GET("/quiz-soals", controllers.GetQuizSoals)
	r.GET("/quiz-soals/:id", controllers.GetQuizSoal)
	r.POST("/quiz-soals", controllers.CreateQuizSoal)
	r.PUT("/quiz-soals/:id", controllers.UpdateQuizSoal)
	r.DELETE("/quiz-soals/:id", controllers.DeleteQuizSoal)

	r.GET("/siswa", controllers.GetSiswa)
	r.GET("/siswa/:id", controllers.GetSiswaByID)
	r.POST("/siswa", controllers.CreateSiswa)
	r.PUT("/siswa/:id", controllers.UpdateSiswa)
	r.DELETE("/siswa/:id", controllers.DeleteSiswa)

	r.GET("/ujians", controllers.GetUjians)
	r.GET("/ujians/:id", controllers.GetUjian)
	r.POST("/ujians", controllers.CreateUjian)
	r.PUT("/ujians/:id", controllers.UpdateUjian)
	r.DELETE("/ujians/:id", controllers.DeleteUjian)

	r.GET("/ujian-soals", controllers.GetUjianSoals)
	r.GET("/ujian-soals/:id", controllers.GetUjianSoal)
	r.POST("/ujian-soals", controllers.CreateUjianSoal)
	r.PUT("/ujian-soals/:id", controllers.UpdateUjianSoal)
	r.DELETE("/ujian-soals/:id", controllers.DeleteUjianSoal)

	r.GET("/users", controllers.GetUsers)
	r.GET("/users/:id", controllers.GetUser)
	r.POST("/users", controllers.CreateUser)
	r.PUT("/users/:id", controllers.UpdateUser)
	r.DELETE("/users/:id", controllers.DeleteUser)

	r.GET("/operators", controllers.GetOperators)
	r.GET("/operators/:id", controllers.GetOperator)
	r.POST("/operators", controllers.CreateOperator)
	r.PUT("/operators/:id", controllers.UpdateOperator)
	r.DELETE("/operators/:id", controllers.DeleteOperator)

	r.GET("/nilais", controllers.GetNilais)
	r.GET("/nilais/:id", controllers.GetNilai)
	r.POST("/nilais", controllers.CreateNilai)
	r.PUT("/nilais/:id", controllers.UpdateNilai)
	r.DELETE("/nilais/:id", controllers.DeleteNilai)

	return r
}
