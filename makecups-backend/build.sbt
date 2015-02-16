import sbt.Keys._

val playDependencies = Seq(
  javaJdbc,
  javaEbean,
  cache,
  javaWs
)

lazy val root = (project in file(".")).enablePlugins(PlayJava).
  settings(
    name := """makecups-backend""",
    version := "1.0-SNAPSHOT",
    scalaVersion := "2.11.1",
    libraryDependencies ++= playDependencies
  )




