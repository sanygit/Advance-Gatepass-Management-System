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

// gatepass table
gatepass_addTip=["",spacer+"This option allows all members of the group to add records to the 'gatepass' table. A member who adds a record to the table becomes the 'owner' of that record."];

gatepass_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'gatepass' table."];
gatepass_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'gatepass' table."];
gatepass_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'gatepass' table."];
gatepass_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'gatepass' table."];

gatepass_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'gatepass' table."];
gatepass_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'gatepass' table."];
gatepass_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'gatepass' table."];
gatepass_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'gatepass' table, regardless of their owner."];

gatepass_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'gatepass' table."];
gatepass_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'gatepass' table."];
gatepass_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'gatepass' table."];
gatepass_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'gatepass' table."];

// gates table
gates_addTip=["",spacer+"This option allows all members of the group to add records to the 'gates' table. A member who adds a record to the table becomes the 'owner' of that record."];

gates_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'gates' table."];
gates_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'gates' table."];
gates_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'gates' table."];
gates_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'gates' table."];

gates_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'gates' table."];
gates_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'gates' table."];
gates_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'gates' table."];
gates_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'gates' table, regardless of their owner."];

gates_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'gates' table."];
gates_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'gates' table."];
gates_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'gates' table."];
gates_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'gates' table."];

// individuals table
individuals_addTip=["",spacer+"This option allows all members of the group to add records to the 'individuals' table. A member who adds a record to the table becomes the 'owner' of that record."];

individuals_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'individuals' table."];
individuals_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'individuals' table."];
individuals_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'individuals' table."];
individuals_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'individuals' table."];

individuals_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'individuals' table."];
individuals_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'individuals' table."];
individuals_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'individuals' table."];
individuals_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'individuals' table, regardless of their owner."];

individuals_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'individuals' table."];
individuals_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'individuals' table."];
individuals_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'individuals' table."];
individuals_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'individuals' table."];

// kikundi table
kikundi_addTip=["",spacer+"This option allows all members of the group to add records to the 'Groups' table. A member who adds a record to the table becomes the 'owner' of that record."];

kikundi_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Groups' table."];
kikundi_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Groups' table."];
kikundi_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Groups' table."];
kikundi_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Groups' table."];

kikundi_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Groups' table."];
kikundi_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Groups' table."];
kikundi_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Groups' table."];
kikundi_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Groups' table, regardless of their owner."];

kikundi_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Groups' table."];
kikundi_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Groups' table."];
kikundi_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Groups' table."];
kikundi_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Groups' table."];

// luggage table
luggage_addTip=["",spacer+"This option allows all members of the group to add records to the 'luggage' table. A member who adds a record to the table becomes the 'owner' of that record."];

luggage_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'luggage' table."];
luggage_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'luggage' table."];
luggage_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'luggage' table."];
luggage_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'luggage' table."];

luggage_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'luggage' table."];
luggage_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'luggage' table."];
luggage_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'luggage' table."];
luggage_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'luggage' table, regardless of their owner."];

luggage_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'luggage' table."];
luggage_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'luggage' table."];
luggage_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'luggage' table."];
luggage_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'luggage' table."];

// staff table
staff_addTip=["",spacer+"This option allows all members of the group to add records to the 'staff' table. A member who adds a record to the table becomes the 'owner' of that record."];

staff_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'staff' table."];
staff_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'staff' table."];
staff_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'staff' table."];
staff_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'staff' table."];

staff_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'staff' table."];
staff_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'staff' table."];
staff_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'staff' table."];
staff_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'staff' table, regardless of their owner."];

staff_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'staff' table."];
staff_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'staff' table."];
staff_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'staff' table."];
staff_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'staff' table."];

// vehicles table
vehicles_addTip=["",spacer+"This option allows all members of the group to add records to the 'vehicles' table. A member who adds a record to the table becomes the 'owner' of that record."];

vehicles_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'vehicles' table."];
vehicles_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'vehicles' table."];
vehicles_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'vehicles' table."];
vehicles_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'vehicles' table."];

vehicles_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'vehicles' table."];
vehicles_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'vehicles' table."];
vehicles_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'vehicles' table."];
vehicles_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'vehicles' table, regardless of their owner."];

vehicles_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'vehicles' table."];
vehicles_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'vehicles' table."];
vehicles_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'vehicles' table."];
vehicles_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'vehicles' table."];

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
