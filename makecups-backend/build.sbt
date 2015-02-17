import sbt.Keys._

val playDependencies = Seq(
  javaJdbc,
  javaEbean,
  cache,
  javaWs
)

lazy val dddEasy = project

lazy val root = (project in file(".")).enablePlugins(PlayJava).
  aggregate(dddEasy).
  dependsOn(dddEasy).
  settings(
    name := """makecups-backend""",
    version := "1.0-SNAPSHOT",
    scalaVersion := "2.11.1",
    libraryDependencies ++= playDependencies,
    compile in Test <<= Play.PostCompile(Test)
  )




