unit Unit1;

{$mode objfpc}{$H+}

interface

uses
  Classes, SysUtils, Forms, Controls, Graphics, Dialogs, StdCtrls, lazlogger,
  RTTICtrls, Variants
  {$IFDEF MACOS}
,Posix.Stdlib
{$ENDIF}
{$IFDEF MSWINDOWS}
,Windows
,ShellAPI
{$ENDIF}
  ;

type

  { TForm1 }

  TForm1 = class(TForm)
    Button1: TButton;
    Button2: TButton;
    Edit1: TEdit;
    Label1: TLabel;
    Label2: TLabel;
    Label3: TLabel;
    Memo1: TMemo;
    procedure Button1Click(Sender: TObject);
    procedure Button2Click(Sender: TObject);
    procedure FormCreate(Sender: TObject);
    procedure Label2Click(Sender: TObject);
    procedure Label3Click(Sender: TObject);
    procedure Memo1Change(Sender: TObject);
  private

  public

  end;

var
  Form1: TForm1;
    C : Char;
    File1: TextFile;
    Str: String;
    SearchStr: String;
    FileName: String;
    i: Integer;
    Line: String;
    SupportUrl: String;
implementation

{$R *.lfm}



{ TForm1 }

procedure TForm1.Label2Click(Sender: TObject);
begin

end;

procedure TForm1.Label3Click(Sender: TObject);
begin
   SupportUrl := 'https://nihongochat.com/opennihongo';
  {$IFDEF MACOS}
    _system(PAnsiChar('open ' + SupportUrl));
  {$ENDIF}
  {$IFDEF MSWINDOWS}
     ShellExecute(Self.Handle, 'open', PChar(SupportUrl), '', '', SW_SHOWNORMAL);
  {$ENDIF}
end;

procedure TForm1.Memo1Change(Sender: TObject);
begin

end;

procedure TForm1.Button1Click(Sender: TObject);
begin
//    Debugln('File Reading:');
    FileName := 'test.dic';
    Label2.Caption:=FileName;
    AssignFile(File1, FileName);
    SearchStr:=Edit1.Text;
    {$I+}
    Line:='';
    try
      Reset(File1);
      repeat
        Readln(File1, Str);
        i := Pos(SearchStr, Str);
        if i = 1 then
        begin
           Line:= Line + Str + #13#10 + '----------------' + #13#10;
        end;
      until(EOF(File1));
      CloseFile(File1);
    except
      on E: EInOutError do
      begin
      end;
    end;
    Memo1.Text:=Line;
  end;

procedure TForm1.Button2Click(Sender: TObject);
begin

end;

procedure TForm1.FormCreate(Sender: TObject);
begin
      Edit1.Caption:='(Insert Keyword and push Search)';
      FileName := 'test.dic';
      Label2.Caption:=FileName;
      Label3.Caption:='OpenNihongo project';
      Memo1.Text:='(Result will display here)';
end;

end.
