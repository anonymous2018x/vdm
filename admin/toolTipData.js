var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// managers table
managers_addTip=["",spacer+"This option allows all members of the group to add records to the 'Managers' table. A member who adds a record to the table becomes the 'owner' of that record."];

managers_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Managers' table."];
managers_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Managers' table."];
managers_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Managers' table."];
managers_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Managers' table."];

managers_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Managers' table."];
managers_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Managers' table."];
managers_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Managers' table."];
managers_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Managers' table, regardless of their owner."];

managers_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Managers' table."];
managers_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Managers' table."];
managers_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Managers' table."];
managers_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Managers' table."];

// projects table
projects_addTip=["",spacer+"This option allows all members of the group to add records to the 'Projects' table. A member who adds a record to the table becomes the 'owner' of that record."];

projects_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Projects' table."];
projects_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Projects' table."];
projects_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Projects' table."];
projects_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Projects' table."];

projects_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Projects' table."];
projects_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Projects' table."];
projects_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Projects' table."];
projects_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Projects' table, regardless of their owner."];

projects_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Projects' table."];
projects_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Projects' table."];
projects_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Projects' table."];
projects_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Projects' table."];

// class_time_table table
class_time_table_addTip=["",spacer+"This option allows all members of the group to add records to the 'Class time table' table. A member who adds a record to the table becomes the 'owner' of that record."];

class_time_table_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Class time table' table."];
class_time_table_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Class time table' table."];
class_time_table_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Class time table' table."];
class_time_table_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Class time table' table."];

class_time_table_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Class time table' table."];
class_time_table_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Class time table' table."];
class_time_table_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Class time table' table."];
class_time_table_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Class time table' table, regardless of their owner."];

class_time_table_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Class time table' table."];
class_time_table_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Class time table' table."];
class_time_table_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Class time table' table."];
class_time_table_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Class time table' table."];

// assignments table
assignments_addTip=["",spacer+"This option allows all members of the group to add records to the 'Assignments' table. A member who adds a record to the table becomes the 'owner' of that record."];

assignments_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Assignments' table."];
assignments_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Assignments' table."];
assignments_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Assignments' table."];
assignments_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Assignments' table."];

assignments_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Assignments' table."];
assignments_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Assignments' table."];
assignments_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Assignments' table."];
assignments_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Assignments' table, regardless of their owner."];

assignments_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Assignments' table."];
assignments_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Assignments' table."];
assignments_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Assignments' table."];
assignments_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Assignments' table."];

// personal_time_table table
personal_time_table_addTip=["",spacer+"This option allows all members of the group to add records to the 'Personal time table' table. A member who adds a record to the table becomes the 'owner' of that record."];

personal_time_table_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Personal time table' table."];
personal_time_table_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Personal time table' table."];
personal_time_table_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Personal time table' table."];
personal_time_table_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Personal time table' table."];

personal_time_table_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Personal time table' table."];
personal_time_table_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Personal time table' table."];
personal_time_table_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Personal time table' table."];
personal_time_table_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Personal time table' table, regardless of their owner."];

personal_time_table_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Personal time table' table."];
personal_time_table_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Personal time table' table."];
personal_time_table_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Personal time table' table."];
personal_time_table_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Personal time table' table."];

// student_details table
student_details_addTip=["",spacer+"This option allows all members of the group to add records to the 'Student details' table. A member who adds a record to the table becomes the 'owner' of that record."];

student_details_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Student details' table."];
student_details_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Student details' table."];
student_details_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Student details' table."];
student_details_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Student details' table."];

student_details_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Student details' table."];
student_details_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Student details' table."];
student_details_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Student details' table."];
student_details_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Student details' table, regardless of their owner."];

student_details_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Student details' table."];
student_details_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Student details' table."];
student_details_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Student details' table."];
student_details_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Student details' table."];

// notices table
notices_addTip=["",spacer+"This option allows all members of the group to add records to the 'Notices' table. A member who adds a record to the table becomes the 'owner' of that record."];

notices_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Notices' table."];
notices_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Notices' table."];
notices_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Notices' table."];
notices_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Notices' table."];

notices_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Notices' table."];
notices_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Notices' table."];
notices_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Notices' table."];
notices_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Notices' table, regardless of their owner."];

notices_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Notices' table."];
notices_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Notices' table."];
notices_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Notices' table."];
notices_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Notices' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
