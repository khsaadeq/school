<?php

namespace App\Http\Controllers\api;

use App\Models\job;
//use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\gender;
use App\Models\identity;
use App\Models\nationality;
use App\Models\Qualification_study;
use App\Models\atendance;
use App\Models\system_episod;
use App\Http\Controllers\Controller;

class appsettingscontroller extends Controller
{
    public function generateRoles($id=0){
        // $system = system_episod::find($id==0);
    //         if(!$system){
    //     $super_admin=new Role();
    //     $super_admin->name="student";
    //     $super_admin->display_name='site student';
    //     $super_admin->description='this role allow student';
    //     $super_admin->save();

    //     $manager=new Role();
    //     $manager->name="manager";
    //     $manager->display_name='site manager';
    //     $manager->description='manage only articles and comments';
    //     $manager->save();

    //     $user=new Role();
    //     $user->name="user";
    //     $user->display_name='site user';
    //     $user->description='this role  user';
    //     $user->save();

    //     $user=new Role();
    //     $user->name="guardian";
    //     $user->display_name='site guardian';
    //     $user->description='this role  guardian';
    //     $user->save();
    //    return response()->json([
    // 'message' => 'Roles successfully registered','Roles' => $super_admin,$manager,$user,$user], 201);

    //     }
    //   else { return response()->json([
    //         'message' => 'Roles not successfully registered','Roles' => null], 400);}

    }
    public function updeteUserRole(){
        $user1=User::find(1);
        $user1->addRole('student');
        $user2=User::find(2);
        $user2->addRole('manager');
        $user2=User::find(5);
        $user2->addRole('user');
        $user2=User::find(6);
        $user2->addRole('guardian');
    }
    public function generateIdentity($id=0){
        $identity = identity::find($id==0);
        if(!$identity){
        $identity=new identity();
        $identity->type_identity="جواز ";
        $identity->save();
        $identit=new identity();
        $identit->type_identity="كرت التحصين ";
        $identit->save();
        $identi=new identity();
        $identi->type_identity="بطاقة شخصيه ";
        $identi->save();
        $ident=new identity();
        $ident->type_identity="شهادة ميلاد ";
        $ident->save();
        $iden=new identity();
        $iden->type_identity="بطاقة ضمان ";
        $iden->save();
        $ide=new identity();
        $ide->type_identity="لايوجد ";
         $ide->save();
         return response()->json([
            'message' => 'identity successfully registered','identity' => $identity
            ,$identit,
            $identi,
            $ident,
            $iden,
            $ide,], 201);

        }
          else {
            return response()->json([
                'message' => 'identity Not successfully registered','identity' => null], 400);
        }
    }
    public function generateNationality($id=0){
        $identity = nationality::find($id==0);
        if(!$identity){
        $nationality=new nationality();
        $nationality->name="يمني ";
        $nationality->save();
        $nationalit=new nationality();
        $nationalit->name="سعودي ";
        $nationalit->save();
        $nationali=new nationality();
        $nationali->name="مصري ";
        $nationali->save();
        $national=new nationality();
        $national->name="صومالي ";
        $national->save();
        $nationa=new nationality();
        $nationa->name="سوداني ";
        $nationa->save();
        return response()->json([
            'message' => 'nationality successfully registered','nationality' => $nationality,
            $nationalit,$nationali,$national,$nationa,], 201);}
          else {
            return response()->json([
                'message' => 'nationality Not successfully registered','nationality' => null], 400);
    }
    }
        public function generateQualification_study($id=0){
            $Qualif = Qualification_study::find($id==0);
            if(!$Qualif){
            $Qualification=new Qualification_study();
            $Qualification->name=" خاتم ";
            $Qualification->save();
            $Qualification_st=new Qualification_study();
            $Qualification_st->name="مجاز ";
            $Qualification_st->save();
            $Qualification_s=new Qualification_study();
            $Qualification_s->name="قراءات ";
            $Qualification_s->save();
            return response()->json([
                'message' => 'Qualification_study successfully registered','Qualification_study' => $Qualification,$Qualification_st,$Qualification_s], 201);}
              else {
                return response()->json([
                    'message' => 'Qualification_study Not successfully registered','Qualification_study' => null], 400);
        }}
        public function generatejop($id=0){
            $job = job::find($id==0);
            if(!$job){
            $Qualificat=new job();
            $Qualificat->name=" مدير ";
            $Qualificat->save();
            $Qualificatio=new job();
            $Qualificatio->name="معلم ";
            $Qualificatio->save();
            $Qualifica=new job();
            $Qualifica->name="مشرف ";
            $Qualifica->save();
            $Quali=new job();
            $Quali->name="موجه ";
            $Quali->save();

            return response()->json([
                'message' => 'job successfully registered','job' =>
                $Qualificat,
                $Qualificatio,
                $Qualifica,$Quali,], 201);}
              else {
                return response()->json([
                    'message' => 'job Not successfully registered','job' => null], 400);
        }}
        public function generateGender($id=0){
            $gene = gender::find($id==0);
            if(!$gene){
            $gener=new gender();
            $gener->name="ذكر ";
            $gener->save();
            $generateGender=new gender();
            $generateGender->name=" انثى ";
            $generateGender->save();
            return response()->json([
                'message' => 'gender successfully registered','gender' => $generateGender,$gener], 201);}
              else {
                return response()->json([
                    'message' => 'gender Not successfully registered','gender' => null], 400);
        }}
        public function generateSystem_Spisod($id=0){
            $system = system_episod::find($id==0);
            if(!$system){
            $system_episod=new system_episod();
            $system_episod->name=" تلقين ";
            $system_episod->save();
            $system_e=new system_episod();
            $system_e->name="تسميع ";
            $system_e->save();
            $syste=new system_episod();
            $syste->name="تلاوه ";
            $syste->save();
            return response()->json([
                'message' => 'system_episod successfully registered','system_episod' => $system_episod,$system_e,$syste], 201);}
              else {
                return response()->json([
                    'message' => 'system_episod Not successfully registered','system_episod' => null], 400);}}

                    public function generateatendance($id=0){
                $aten = atendance::find($id==0);
                if(!$aten){
                    $atendances=new atendance();
                    $atendances->name=" حاضر ";
                    $atendances->save();
                    $atendance=new atendance();
                    $atendance->name=" غائب ";
                    $atendance->save();
                    $atendanc=new atendance();
                    $atendanc->name=" غائب بإذن ";
                    $atendanc->save();
                    $atendan=new atendance();
                    $atendan->name=" حضر ولم يسمع ";
                    $atendan->save();
                    $atenda=new atendance();
                    $atenda->name=" انصراف بإذن ";
                    $atenda->save();

                return response()->json([
                    'message' => 'atendances successfully registered','atendances' => $atendances,$atendance,$atendanc,$atendan,$atenda], 201);}
                    else {
                    return response()->json([
                        'message' => 'atendances Not successfully registered','atendances' => null], 400);
                }}
}
